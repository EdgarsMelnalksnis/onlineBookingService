FROM php:8.2-cli

WORKDIR /app
COPY . .

# Expose the default port used by PHP's built-in server
EXPOSE 8000

CMD php -S 0.0.0.0:8000 -t public
