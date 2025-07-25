# Brave CMS 2.0

## What is this about? 

This is a simple, easy to use, CMS, ideal for an online newspaper or a blog. Laravel masters are invited to *contribute*.

#### Why use it

1. It's written in Laravel 8.
2. It's scalable.
3. The code is DRY and easy-to-follow, so contributors will have no headaches.
4. The newsletter form is integrated with **Mailchimp**.
5. It's Admin is designed with **Bootstrap 5 SASS** and very easy to customize.
6. It is free (but patrons will be appreciated).

### Login form

![Login](https://github.com/Ajax30/BraveCMS-2.0/blob/main/screenshots/login.png)

### Dashboard

![Dashboard](https://github.com/Ajax30/BraveCMS-2.0/blob/main/screenshots/dashboard.png)

### Articles

![Articles list](https://github.com/Ajax30/BraveCMS-2.0/blob/main/screenshots/articles-list.png)

### Add article

![Add article](https://github.com/Ajax30/BraveCMS-2.0/blob/main/screenshots/article-add.png)

### Edit article

![Edit article](https://github.com/Ajax30/BraveCMS-2.0/blob/main/screenshots/article-edit.png)

### Site settings

The **super-admin** has access to the *Settings* section.

![Settings preview](https://github.com/Ajax30/BraveCMS-2.0/blob/main/screenshots/settings.png)

### Homepage

![Homepage preview](https://github.com/Ajax30/BraveCMS-2.0/blob/main/screenshots/homepage.png)


# How to use Brave CMS

I have created a simple installation process: after creating a database and providing credentials (the appropriate values for `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`) in the `.env` file (placed in the root directory), you can run the `Install` controller which will create all the necessary tables.

Alternatively, you can import `minimal.sql`, which contains all the necessary tables. You can find it in the root of the repository.

After that, you will be invited to *sign up*. After a successful sign-up, because you are the *first user*, you will be given the role of `super-admin`.

You will be able to sign in and write articles, add or delete categories, etc.   

# License

MIT License

Copyright (c) 2022 Razvan Zamfir

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
