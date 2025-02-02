<?php
namespace Concept\Business;

use Concept\Entity\EntityInterface;
use Concept\EventDispatcher\EventDispatcher;
use Concept\EventDispatcher\EventDispatcherInterface;

/**
 * @author      Zeki Unal <zekiunal@gmail.com>
 * @description
 *
 * @package     Concept\Business
 * @name        AbstractBusiness
 * @version     0.1
 */
abstract class AbstractBusiness implements EntityInterface
{
    /**
     * User exposed observable events
     *
     * @var array
     */
    protected $observables = array();

    /**
     * The event dispatcher instance.
     *
     * @var EventDispatcherInterface
     */
    protected static $dispatcher;

    /**
     * EntityInterface implementation of convertArray()
     *
     * @return array
     */
    abstract public function convertArray();

    /**
     * EntityInterface implementation of getId()
     *
     * @return mixed
     */
    abstract public function getId();

    /**
     * EntityInterface implementation of setId()
     *
     * @param  mixed $id
     *
     * @return mixed
     */
    abstract public function setId($id);

    /**
     * @todo its not good way
     * @param array $data
     */
    public function bind($data)
    {
        $keys = array_keys($data);
        foreach($keys as $value) {
            if(isset($data[$value]) and ($this->$value != $data[$value])) {
                $this->$value = $data[$value];
            }
        }
    }

    /**
     * Get the observable event names.
     *
     * @return array
     */
    public function getObservableEvents()
    {
        return array_merge(
            array(
                'creating', 'created', 'updating', 'updated',
                'deleting', 'deleted', 'saving', 'saved',
                'restoring', 'restored',
            ),
            $this->observables
        );
    }

    /**
     * Get the event dispatcher instance.
     *
     * @return       EventDispatcherInterface
     */
    public static function getEventDispatcher()
    {
        if ( ! isset(static::$dispatcher)) {
            static::setEventDispatcher(new EventDispatcher());
        }

        return static::$dispatcher;
    }

    /**
     * Set the event dispatcher instance.
     *
     * @param  EventDispatcherInterface $dispatcher
     * @return void
     */
    public static function setEventDispatcher(EventDispatcherInterface $dispatcher)
    {
        static::$dispatcher = $dispatcher;
    }

    /**
     * Unset the event dispatcher for models.
     *
     * @return void
     */
    public static function unsetEventDispatcher()
    {
        static::$dispatcher = null;
    }

    /**
     * Register a model event with the dispatcher.
     *
     * @param  string  $event
     * @param  \Closure|string  $callback
     * @param  int  $priority
     * @return void
     */
    protected static function registerEvent($event, $callback, $priority=0)
    {
        if ( ! isset(static::$dispatcher)) {
            static::setEventDispatcher(new EventDispatcher());
        }

        static::$dispatcher->listen($event, $callback, $priority);
    }
}
