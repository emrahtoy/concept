<?php
namespace Concept\EventDispatcher;

/**
 * @author      Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author      Jonathan Wage <jonwage@gmail.com>
 * @author      Roman Borschel <roman@code-factory.org>
 * @author      Bernhard Schussek <bschussek@gmail.com>
 *
 * @description An EventSubscriber knows himself what events he is interested in.
 *              If an EventSubscriber is added to an EventDispatcherInterface, the manager invokes
 *              {@link getSubscribedEvents} and registers the subscriber as a listener for all
 *              returned events.
 *
 * @package     Concept\EventDispatcher
 * @name        EventSubscriberInterface
 * @version     0.1
 */
interface EventSubscriberInterface
{
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents();
}
