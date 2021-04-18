<p align="center"><img src="https://miro.medium.com/max/984/1*IHI90aWzUnrcfHDuh08YTg.png" width="400"></p>

## Installation Instructions

Follow these steps to install the application:

- Edit your 'Homestead.yaml' and the the following:
`- map: college.api
  to: /home/vagrant/WAF/MyLaravelProjects/CollegeApi/public`
  Also create the database in the Homestead.yaml file: `- college_api`
- Next, duplicate '.env.example' and name it '.env'
- Open .env and set the DB_DATABASE to the db you created in the Homestead file and set the username and password to the correct credentials

Then run `vagrant reload --provision` to refresh the Homestead environment. 
Add college.api to your hosts file.

In the Homestead environment, cd into the application folder and run the following:

- `composer install`
- `npm install`
- `php artisan key:generate`
- `php artisan passport:install`

Then migrate and seed the database:

- `php artisan migrate --seed`

And then initialise, add, and commit to Git:

- `git init`
- `git add .`
- `git commit -am "Initial commit"`

Set your own remote git repo and push your commits
