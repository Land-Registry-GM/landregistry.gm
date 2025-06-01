## Filament command
php artisan make:filament-resource Property


# Relationship managers
php artisan make:filament-relation-manager PropertyResource owners title
php artisan make:filament-relation-manager PropertyResource documents title
php artisan make:filament-relation-manager PropertyResource legalEncumbrances title
php artisan make:filament-relation-manager PropertyResource transactions title
php artisan make:filament-relation-manager PropertyResource taxRecords title
php artisan make:filament-relation-manager PropertyResource surveys title
php artisan make:filament-relation-manager PropertyResource permits title
php artisan make:filament-relation-manager PropertyResource disputes title

## many to many relationship
php artisan make:migration create_property_owner_table


## Filament Resources & CRUD operation very simplified
php artisan make:filament-resource Owner
php artisan make:filament-resource Property

https://filamentphp.com/docs/2.x/admin/resources/getting-started

can different people owning the same land have different type of ownership e.g. one has Freehold and the other have Lease ownership?

