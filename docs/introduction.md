 <!-- introduction.md -->
 
 # Laravel-Mager
 
 Laravel package for design and generate a ready to use application. **Laravel-Mager** provides some features to generate Laravel framework codes without writing any code. The features are:
 
 [![Laravel-Mager : Laravel Package for design and generate a ready to use application (demonstration)](_images/youtube-cover.png)](https://www.youtube.com/watch?v=URUWZ1qPG7U "Laravel-Mager : Laravel Package for design and generate a ready to use application (demonstration)")
 
 ## Pages Manager
 Pages Manager provides drag and drop GUI Builder similar to common IDE like Visual Studio and Netbeans. You don't need to write `blade` view files, just design a layout by drag and drop html component in GUI Builder.
 
 ![](_images/pages/introduction/gui-builder.png)
 
 ## Project Configuration
 Choose theme, add application icon, and manage menu list can be managed easily using Project Configuration. You don't need to create a `blade` theme layout anymore.
 
 ![](_images/pages/introduction/themes.png)
 
 ## REST Manager
 REST Manager provides options for designing REST API JSON response format, you can wrap or not the response. This feature will automatically generate the `Eloquent` API Resource and Collection.
 
 ![](_images/pages/introduction/rest-format.png)
 
 ## Database Manager
 Database Manager will substitute common database manager application like PHPMyAdmin or Adminer. It will produce `Eloquent` model, model factory, seeder, and migration. You also can generate dummy data automatically using `faker` dependency without writing any code.
 
 ![](_images/pages/introduction/db-manager.png)
 
 # Development
 **`Laravel-Mager is still under development`** as a prototype for student final project at PENS (Politeknik Elektronika Negeri Surabaya). 
 Finished features only handle basic CRUD operation for independent database table without any relation also without validation.
 GUI Builder also only provides some simple html and form components such as textbox, numberbox, emailbox, passwordbox, textarea, heading, data table, and simple thumbnail view.
 Laravel-Mager is using AdminLTE for layout view and can be easily customized. 
