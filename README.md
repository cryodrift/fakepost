# chrisg/fakepost

This package was extracted from the monorepo (fakepost) preserving history.

Requires:
- chrisg/fw (^1.0)
- chrisg/htmlload-skeleton (^1.0)

# Fakepost Middleware Documentation

This document provides an overview of how the Fakepost middleware works in the application.

## Overview

The Fakepost middleware is a utility for simulating POST requests by loading data from files. It's primarily designed for testing and development purposes, allowing developers to easily mock POST requests without needing to set up complex test environments.

## Components

### Cli Handler

The `Cli.php` component is the main handler that processes POST requests in CLI mode. It:
- Intercepts POST requests
- Parses POST data from files
- Sets the parsed data as request variables

### ParamPost

The `ParamPost.php` component extends the system's `ParamFile` class to handle POST parameters. It:
- Loads POST data from files
- Handles special cases like empty values

## Usage

### Command Line

The middleware is automatically registered when running in CLI mode. To use it:

1. Create a text file with your POST data in the format:
   ```
   key1: value1
   key2: value2
   ```

2. Pass this file as a parameter to your CLI command:
   ```
   php index.php /your/endpoint -post=path/to/postdata.txt
   ```

3. The middleware will parse the file and set the key-value pairs as POST variables in the request.

### Example

Given a file `postdata.txt` with the content:
```
username: testuser
password: testpass
```

Running:
```
php index.php /login -post=postdata.txt
```

Will simulate a POST request to `/login` with the username and password parameters.

## Configuration

The middleware is automatically registered in CLI mode through the `config.php` file. No additional configuration is required for basic usage.

## Integration

The Fakepost middleware integrates with the system's request handling pipeline and works seamlessly with other components that process POST data.
