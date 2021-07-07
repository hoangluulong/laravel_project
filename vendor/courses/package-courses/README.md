# package-courses

1. Language standard
1. Add filters on table data
1. Add token for prevent XSRF

## Step 1: Add service providers to **config/app.php**

1. Courses\Courses\CoursesServiceProvider::class,
2. Collective\Html\HtmlServiceProvider::class,

## Step 2: Add class aliases to **config/app.php**

1. 'Input' => Illuminate\Support\Facades\Request::class,
1. 'Form' => Collective\Html\FormFacade::class,
1. 'Html' => Collective\Html\HtmlFacade::class,

## Step 3: Change model providers class Auth aliases to **config/auth.php**
1. 'model' => Courses\Courses\Models\User::class,

## Step 4: Delete user and password migration file in database/migrations

## Step 5: add session

1. php artisan session:table

## Step 6: Install publish

1. php artisan vendor:publish --provider="Courses\Courses\CoursesServiceProvider" --force

## Step 7: Publish the package’s config and assets :

1. php artisan vendor:publish --tag=lfm_config
1. php artisan vendor:publish --tag=lfm_public

## Step 8: Clear cache
1. php artisan route:clear
1. php artisan config:clear
1. php artisan storage:link

## Step 9: Migrate and Seeder
Run the following
1. php artisan migrate
1. php artisan db:seed
