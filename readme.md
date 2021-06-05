# Duilo Plugin Framework

Duilo is a Wordpress Plugin Framework built to help with quick plugin integrations in my own workflow, also with learning the OOP plugin construction for Wordpress. I wanted to share this contribution with all the software developers and collaborators to help with the Wordpress Plugin Construction.

I hope you like this framework, which is still under construction. Any contribution or suggest will be accepted and will be taken to improve this new custom project.

## Installation
To install, first you need to instantiate the `Init` Class, where you going to create all your features. Just to start, in your main plugin initial file, set this:

```
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php') ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
if ( class_exists( 'Inc\\Init' ) ) {

    Inc\Init::register_services();

}
```

You'll need to reference and start developing your functions and features in this Init class.

In the Init Class, you'll see a `get_services` method, where you need to set up your needed classes. So, for example, if you want a API Class instantiated here, create the class and make sure you add a `register` method inside. This method will be used to initialize all the logic of your plugin.

## Pages, subpages and menus
The menu pages and subpages can be set inside the `PagesController` Class, located in the `includes/Src` folder. The methods that can be modified are `setPages` and `setSubpages`. Automatically, following the same format, you'll see your pages and submenu pages in the admin panel of your Wordpress.

## Set Option Groups, Sections and fields
To set the groups, sections and fields, you need to edit the `SettingsController` Class inside `includes/Src` folder. On `setManagers` method, you'll see a `$this->manager` property where in the same current order of this example, can be set.

## UI options
There are 6 Form UI fields for the administration panel. You can use either `uiToggleField`, `textField`, `textareaField`, `checkboxField`, `radioField` or `dropdownField`. Those values can be set on the Admin Controller at `includes/Controller.php` with the `$this->manager` declarated property and the key `callback`. It's where you have to set your option_groups, sections and fields.

You'll see 6 examples of field declarations in the location.

## Adding new Controllers
With the purpose to make this as modular and easy to handle as possible, you can add new controllers to this plugin. To do that, just add a new class following convention `NameController`, and go to the `Init` Class and add your controller class to the `get_services` method. You'll find an array with all needed class and controllers currently being used.