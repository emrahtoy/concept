<?php
namespace Concept\Storage\Handler;

use Concept\Filter\FilterInterface;
use Concept\Handler\HandlerAbstract;
use Concept\Handler\HandlerInterface;
use Concept\Entity\EntityInterface;
use Concept\Entity\Manager\EntityManagerInterface;

/**
 * @author      Zeki Unal <zekiunal@gmail.com>
 * @description
 *
 * @package     Concept\Storage\Handler
 * @name        NullHandler
 * @version     0.1
 */
class NullHandler extends HandlerAbstract implements HandlerInterface, EntityManagerInterface
{

    /**
     * @param EntityInterface $entity
     * @param                 $source
     * @param FilterInterface $filter
     *
     * @return EntityInterface
     */
    public static function save(EntityInterface $entity, $source, FilterInterface $filter)
    {
        return false;
    }

    /**
     * @param        FilterInterface $filter
     *
     * @return       array
     */
    public static function load($filter)
    {
        return array();
    }

    /**
     * @param $name
     * @param $id
     *
     * @return bool
     */
    public static function delete($name, $id)
    {
        return false;
    }
}