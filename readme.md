# Duilo Plugin Framework

Duilo is a Wordpress Plugin Framework built to help with quick plugin integrations in my own workflow, also with learning the OOP plugin construction for Wordpress. I wanted to share this contribution with all the software developers and collaborators to help with the Wordpress Plugin Construction.

I hope you like this framework, which is still under construction. Any contribution or suggest will be accepted and will be taken to improve this new project.

## Installation
To install, first you need to instantiate a Init Class, where you going to create all your features. Just to start, in your main plugin initial file, set this:

```
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php') ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
if ( class_exists( 'Inc\\Init' ) ) {

    Inc\Init::register_services();

}
```

You'll need to reference and start developing your functions and features in this Init class.

In the Init Class, you'll see a `get_services` method, where you need to set your needed classes. So, for example, if you want a API Class instantiated here, create the class and make sure you add a `register` method inside. This method will be used to initialize all the logic of your plugin.

## UI options