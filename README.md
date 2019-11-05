# MyMove

This was created as a university project for a module about mobile app development.

Built using PHP.

## Installation

You can setup the site using [Docker](https://www.docker.com);

    $ git clone https://github.com/trovster/mymove.trovster.com.git mymove
    $ cd mymove
    $ npm install
    $ npm run start -- --build

To stop the Docker container run the following;

    $ npm run stop

## Deployment

To deploy the site via GitHub pages, run the following;

    $ npm run build
    $ npm run deploy