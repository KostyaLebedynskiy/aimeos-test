<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Controller
 * @subpackage Jobs
 */


namespace Aimeos\Controller\Jobs\Product\Export;


/**
 * Product export controller factory.
 *
 * @package Controller
 * @subpackage Jobs
 */
class Factory
	extends \Aimeos\Controller\Jobs\Common\Factory\Base
	implements \Aimeos\Controller\Jobs\Common\Factory\Iface
{
	/**
	 * Creates a new controller specified by the given name.
	 *
	 * @param \Aimeos\MShop\Context\Item\Iface $context Context object required by controllers
	 * @param \Aimeos\Bootstrap $aimeos \Aimeos\Bootstrap object
	 * @param string|null $name Name of the controller or "Standard" if null
	 * @return \Aimeos\Controller\Jobs\Iface New controller object
	 */
	public static function create( \Aimeos\MShop\Context\Item\Iface $context, \Aimeos\Bootstrap $aimeos, $name = null )
	{
		/** controller/jobs/product/export/name
		 * Class name of the used product suggestions scheduler controller implementation
		 *
		 * Each default job controller can be replace by an alternative imlementation.
		 * To use this implementation, you have to set the last part of the class
		 * name as configuration value so the controller factory knows which class it
		 * has to instantiate.
		 *
		 * For example, if the name of the default class is
		 *
		 *  \Aimeos\Controller\Jobs\Product\Export\Standard
		 *
		 * and you want to replace it with your own version named
		 *
		 *  \Aimeos\Controller\Jobs\Product\Export\Myalgorithm
		 *
		 * then you have to set the this configuration option:
		 *
		 *  controller/jobs/product/export/name = Myalgorithm
		 *
		 * The value is the last part of your own class name and it's case sensitive,
		 * so take care that the configuration value is exactly named like the last
		 * part of the class name.
		 *
		 * The allowed characters of the class name are A-Z, a-z and 0-9. No other
		 * characters are possible! You should always start the last part of the class
		 * name with an upper case character and continue only with lower case characters
		 * or numbers. Avoid chamel case names like "MyOptimizer"!
		 *
		 * @param string Last part of the class name
		 * @since 2015.01
		 * @category Developer
		 */
		if( $name === null ) {
			$name = $context->getConfig()->get( 'controller/jobs/product/export/name', 'Standard' );
		}

		if( ctype_alnum( $name ) === false )
		{
			$classname = is_string( $name ) ? '\\Aimeos\\Controller\\Jobs\\Product\\Export\\' . $name : '<not a string>';
			throw new \Aimeos\Controller\Jobs\Exception( sprintf( 'Invalid characters in class name "%1$s"', $classname ) );
		}

		$iface = '\\Aimeos\\Controller\\Jobs\\Iface';
		$classname = '\\Aimeos\\Controller\\Jobs\\Product\\Export\\' . $name;

		$controller = self::createController( $context, $aimeos, $classname, $iface );

		/** controller/jobs/product/export/decorators/excludes
		 * Excludes decorators added by the "common" option from the product export job controller
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to remove a decorator added via
		 * "controller/jobs/common/decorators/default" before they are wrapped
		 * around the job controller.
		 *
		 *  controller/jobs/product/export/decorators/excludes = array( 'decorator1' )
		 *
		 * This would remove the decorator named "decorator1" from the list of
		 * common decorators ("\Aimeos\Controller\Jobs\Common\Decorator\*") added via
		 * "controller/jobs/common/decorators/default" to the job controller.
		 *
		 * @param array List of decorator names
		 * @since 2015.01
		 * @category Developer
		 * @see controller/jobs/common/decorators/default
		 * @see controller/jobs/product/export/decorators/global
		 * @see controller/jobs/product/export/decorators/local
		 */

		/** controller/jobs/product/export/decorators/global
		 * Adds a list of globally available decorators only to the product export job controller
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to wrap global decorators
		 * ("\Aimeos\Controller\Jobs\Common\Decorator\*") around the job controller.
		 *
		 *  controller/jobs/product/export/decorators/global = array( 'decorator1' )
		 *
		 * This would add the decorator named "decorator1" defined by
		 * "\Aimeos\Controller\Jobs\Common\Decorator\Decorator1" only to the job controller.
		 *
		 * @param array List of decorator names
		 * @since 2015.01
		 * @category Developer
		 * @see controller/jobs/common/decorators/default
		 * @see controller/jobs/product/export/decorators/excludes
		 * @see controller/jobs/product/export/decorators/local
		 */

		/** controller/jobs/product/export/decorators/local
		 * Adds a list of local decorators only to the product export job controller
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to wrap local decorators
		 * ("\Aimeos\Controller\Jobs\Product\Export\Decorator\*") around the job
		 * controller.
		 *
		 *  controller/jobs/product/export/decorators/local = array( 'decorator2' )
		 *
		 * This would add the decorator named "decorator2" defined by
		 * "\Aimeos\Controller\Jobs\Product\Export\Decorator\Decorator2"
		 * only to the job controller.
		 *
		 * @param array List of decorator names
		 * @since 2015.01
		 * @category Developer
		 * @see controller/jobs/common/decorators/default
		 * @see controller/jobs/product/export/decorators/excludes
		 * @see controller/jobs/product/export/decorators/global
		 */
		return self::addControllerDecorators( $context, $aimeos, $controller, 'product/export' );
	}
}