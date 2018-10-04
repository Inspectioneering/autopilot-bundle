AutopilotBundle
===============

The `AutopilotBundle` provides integration of the [php-autopilothq](https://github.com/dekalee/php-autopilothq) library into Symfony projects.

Installation
============

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require inspectioneering/autopilot-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Inspectioneering\AutopilotBundle\AutopilotBundle(),
        );

        // ...
    }

    // ...
}
```

Usage
=====

This bundle provides a convenience method to create or modify an Autopilot contact. For example:

```php
<?php

// ..
class AppController
{
    public function register(AutopilotManager $ap)
    {
        //...
        $ap->setContact($email, [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'Custom Field' => $custom,
            // ...
        ]);
    }
}
```