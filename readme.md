# CAT CPNS

> This source code is an open source developed in laravel, very customizable!

## Features:

- Dashboard panel
- User Role
- Module Master Question
- Module User
- Module Sheet

## Requirement

- php ^7.3|^8.0
- mysql
- composer


## Installation [ Development mode ]

> [!IMPORTANT]  
> Create new database and rename `.env.example` to `.env` then update you `.env` configs so run this commands:

```bash
git clone https://github.com/henkiws/Simulasi-CAT-Computer-Assisted-Test-CPNS
cd Simulasi-CAT-Computer-Assisted-Test-CPNS
cp .env.example .env
composer install
php artisan migrate:fresh --seed
php artisan key:generate
php artisan serve

```

> [!TIP]
> Default admin email is : `admin@mail.com` (admin) or `user@mail.com` (user) and default password is: `admin123`

### Screenshots

![1](https://raw.githubusercontent.com/henkiws/Simulasi-CAT-Computer-Assisted-Test-CPNS/master/screenshot/login.png)

![2](https://raw.githubusercontent.com/henkiws/Simulasi-CAT-Computer-Assisted-Test-CPNS/master/screenshot/profile.png)

![3](https://raw.githubusercontent.com/henkiws/Simulasi-CAT-Computer-Assisted-Test-CPNS/master/screenshot/master.png)

![4](https://raw.githubusercontent.com/henkiws/Simulasi-CAT-Computer-Assisted-Test-CPNS/master/screenshot/exam.png)


## License
> This repository is licensed under the MIT License.
>
> The MIT License Do's and Dont's summary:
>
>Do's: Use the code in commercial applications: For example, a company can create a proprietary piece of software that includes all or part of the original open source code, then charge money for that software. Modify the code: In other words, developers can change/update the code however they’d like. Distribute copies of the code and any modifications: As long as the original copyright notice and the license itself are included, an organization can distribute and sell copies or modified versions of the code. Sublicense the code: This means you can incorporate the original code into a modification with a stricter license.
>
>Dont's: Can’t hold the code author(s) legally liable for any reason. Can’t delete the copyright notice and original license from your version of the code.
>
>Let's start contributing and make the open-source community a better place for everyone!

<p align="center"> 
    Developed With Love ! ❤️
</p>