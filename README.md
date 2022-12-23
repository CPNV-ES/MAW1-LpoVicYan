# MAW1-LpoVicYan

## Getting started

1. Install **Git 2.37.2.2**
<pre><code>choco install git --version=2.37.2.2</code></pre>

2. Install the latest version of Phpstorm
<pre><code>choco install phpstorm</code></pre>

3. Install **PHP 8.1.9**
<pre><code>choco install php --version=8.1.9</code></pre>

4. Install the latest version of Visual Studio Code
<pre><code>choco install vscode</code></pre>

5. Clone the repository
<pre><code>$ git clone https://github.com/CPNV-ES/MAW1-LpoVicYan.git</code></pre>

6.Import all dependencies
<pre><code>$ composer install</code></pre>

7. Go to src/models and copy/paste the .consts.php.example file. Modify your database credentials
<pre><code>
$dbuser = '....';
$dbpass = '....';
$dbhost = '....';
$dbname = '....';
</code></pre>

8. Create the database with the sql file in conception folder -> exerciselooper.sql

9. Start a php server in public
<pre><code>php -S localhost:1111</code></pre>


