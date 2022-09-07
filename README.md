# Set up 
### Clone Repository
Through Https
```sh
git clone https://github.com/Mashfiqur/product-list-processor.git
```
Through SSH
```sh
git clone git@github.com:Mashfiqur/product-list-processor.git
```


### Change to the project directory
```sh
cd product-list-processor/
```

### Copy docker-compose file
```sh
cp docker-compose-example.yml docker-compose.yml
```
### Copy environment file
```sh
cp .env.example .env
```
### Create Docker Network
```sh
docker network create ecdltd-net
```
### Build the app
```sh
docker-compose up
```
### Need to enter inside the container to run composer install and some other commands
```sh
docker exec -it ecdltd-container bash
```
### Need to run these commands inside the container
```
composer install
```
```
php artisan key:generate
```
# Process 1:
### You can now check your app is running
 URL: http://localhost:8891

You can run the app and parse the file through a form from UI also...

### If you want to run the parser from your terminal

Step 1 : First need to enter inside the container 
```sh
docker exec -it ecdltd-container bash
```
Step 2: Need to move some teb separated file and comma separated file inside the directory storage/app/
        Suppose the name of the files are products_comma_separated.csv and products_tab_separated.tsv

Step 3: Run this command 

For CSV file:
```sh
php artisan parse:file --file=products_comma_separated.csv --unique-combinations=uniq_combination_csv.csv
```
For TSV file:
```sh
php artisan parse:file --file=products_tab_separated.tsv --unique-combinations=uniq_combination_tsv.csv
```

You can check the unique combinations file from storage/app/ directory named as your given name