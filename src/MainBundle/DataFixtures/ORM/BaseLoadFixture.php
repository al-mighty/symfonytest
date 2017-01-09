<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Parser;

abstract class BaseLoadFixture extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    abstract public function load(ObjectManager $manager);

    /**
     * get the orderof this fixture
     *
     * @return integer
     */
    abstract public function getOrder();

    /**
     * Load data from yaml
     *
     * @param $name
     * @return mixed
     */
    protected function loadFromYaml($name)
    {
        $yaml = new Parser();
        
        return $yaml->parse(file_get_contents($this->container->getParameter("fixture.{$name}")));
    }

    /**
     * @param array $data
     * @param $names
     * @return array
     */
    protected function replaceIdByReference(array &$data, $names)
    {
        if (!is_array($names)) {
            $names = [$names];
        }
        
        foreach ($names as $name) {
            if (isset($data[$name])) {
                $data[$name] = $this->getReference($name . $data[$name]);
            }
        }
        
        return $data;
    }

    /**
     * @param array $data
     * @param $name
     * @return null|mixed
     */
    protected function extractForm(array &$data, $name)
    {
        $result = null;
        
        if (array_key_exists($name, $data)) {
            $result = $data[$name];
            unset($data[$name]);
        }
        
        return $result;
    }

    /**
     * @param array $data
     * @param $name
     * @return array|mixed|null
     */
    protected function extractArrayFrom(array &$data, $name)
    {
        return ($a = $this->extractForm($data, $name)) && is_array($a) ? $a : [];
    }

    /**
     * @param array $data
     * @param $name
     * @param $class
     * @return array
     */
    protected function extractAndInstantiateArrayFrom(array &$data, $name, $class)
    {
        return array_map(function ($id) use ($class) {
            if ($entity = $this->container->get('doctrine.orm.entity_manager')->find($class, $id)) {
                return $entity;
            } else {
                throw new \Exception(sprintf('Cannot found entity %s by id=`%s`', $class, $id));
            }
        }, $this->extractArrayFrom($data, $name));
    }

    /**
     * @param array $data
     * @param $names
     */
    protected function convertDateTime(array &$data, $names)
    {
        if (!is_array($names)) {
            $names = [$names];
        }
        
        foreach ($names as $name) {
            if (isset($data[$name])) {
                $data[$name] = new \DateTime($data[$name]);
            }
        }
    }

    /**
     * @param $obj
     * @return string
     */
    protected function stripNamespaceFromClassName($obj)
    {
        $className = get_class($obj);
        
        if (preg_match('@\\\\([\w]+)$@', $className, $matches)) {
            $className = $matches[1];
        }
        
        return $className;
    }

    /**
     * @param $entity
     */
    protected function setReferenceByEntity($entity)
    {
        $id = lcfirst($this->stripNamespaceFromClassName($entity)) . $entity->getId();
        $this->setReference($id, $entity);
    }
}
