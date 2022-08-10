### VKElips
**The package is under development and not ready to use**

### INSTALL

> composer install

`
composer require kaoriel/vkelips
`

> after you installed the package using composer, you need to publish the necessary files and configs

`
php artisan vendor:publish --provider=" Kaoriel\Vkelips\Providers\VkElipsServiceProvider\"
`

>You will create a config in the app/config folder
called `vkelips.php`
it will need to fill in such fields as
> * SERVER_RESPONSE_VK_API
> * VK_BOT_API_KEY
> * VK_API_ENDPOINT
> * VK_API_VERSION


###Examples 
> TODO later....