<div align="center">
  <h1 align="center">Rent Management Interface</h1>

  <p align="left">
    This is a web interface for rent management of items in a shop
  </p>
</div>



<a id="readme-top"></a>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

This app is intended for the management of rent items. This web app allows the easy management of items and customers. For each customer you can manage multiple orders by specifying the rent end date. Doing so you have updates about order status.

Main functionalities:
* CRUD Operations
* Interactivity with AJAX
* Automatic form validation
* Search Query

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With
<p align="left"> 

  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg" width="40" height="40" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original.svg" width="40" height="40" />
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/>
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/>
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/>
</p>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started
To get a local copy up and running follow be ture to have the following steps checked.

### Prerequisites

* Install Homebrew
* Install PHP
  ```sh
  brew install php
  ```
* Configure PHP
  ```sh
  php --ini
  ```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/ccrisc/rent_items_management.git
   ```
2. Enter your DB credentials in `config.php`
    ```php
   define('DB_NAME', '*****');
   define('DB_USER', '*****');
   define('DB_PASSWORD', '*****');
   define('DB_HOST', '*****:3306');;
   ```
3. You can create schema and tables by executing the SQL from the `demo_dump` folder fo getting started
4. Run your local PHP server (if you are using PHPStorm you can set up your server following <a href="http://www.php.cn/faq/738624.html">these instructions</a>)
   ```sh
   php -S localhost:8000
   ```
5. Visit http://localhost:8000

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- USAGE EXAMPLES -->
## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

For more details see  See `CONTRIBUTING.md`

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the GNU GENERAL PUBLIC License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



