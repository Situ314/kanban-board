
![Logo](https://i.ibb.co/QNR3R79/kanban-Logo.png)


# Laravel 10 and Livewire Kanban Board
- [Kanban APP](http://situarts.com/)

Develop a simple Kanban board application using Laravel 10 and Livewire, featuring user authentication and basic project management capabilities.

### Prerequisites

Before you begin, ensure you have the following installed on your system:

- PHP >= 8.0
- Composer
- MySQL
- Node.js and NPM (for compiling assets)


### Instructions

- Clone the project
```bash
  git clone https://github.com/Situ314/kanban-board.git
  cd kanban-board
```
- Install the composer dependencies: 
```bash
  composer install
```
- Install NPM dependencies and compile assets:
```bash
  npm install
  npm run dev
```
- Environment Configuration

Copy the example environment file and make the required configuration changes in the .env file:
```bash
  cp .env.example .env
```
Update these settings in the .env file to correspond with your environment

- Run Migrations

```bash
 php artisan migrate
 ```
- Run seeder: 
```bash
 php artisan db:seed
 ```
- Then generate the key: 
```bash
 php artisan key:generate
 ```
- And finally, run the project: 
```bash
 php artisan serve
 ```
- It will start the application and give you a URL.

Admin Credentials

- username: admin@kanban.com

- password: admin
## 🚀 About Me
As a dedicated and passionate web developer, I thrive on creating dynamic and user-friendly websites that combine aesthetics with functionality. With 7+ years of experience in the industry, I possess a strong foundation in web development technologies and a keen eye for detail.

My expertise lies in utilizing PHP frameworks such as Laravel and CodeIgniter to build robust, scalable, and efficient web solutions. I am skilled at developing clean and maintainable code, analyzing requirements, and conducting thorough testing to ensure optimal performance and user satisfaction. Additionally, I have a solid understanding of front-end technologies like HTML, CSS, and JavaScript; and JS frameworks such as React and VueJS enabling me to create seamless user experiences.


[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/cdanielarteaga/)

