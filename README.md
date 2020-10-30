Weather App Installation Guide
==============================

### Step 1

- [Install the docker](https://docs.docker.com/install/linux/docker-ce/ubuntu/#install-using-the-repository)

### Step 2

- [Install the docker-compose](https://docs.docker.com/compose/install/)

### Step 3

- Clone the project:
```
git clone https://github.com/KebaCorp/SymfonyWeather.git
```

### Step 4

- Run the command at the root of the application:
```
docker-compose up -d --build
```

### Step 5

- Wait for the containers to start,
and then wait about 15 minutes for the vendor installation will be completed
and migrations will be applied

### Step 6

- Installation completed!
- Follow this link to open the API documentation:
[http://localhost:8080/api/doc](http://localhost:8080/api/doc)
