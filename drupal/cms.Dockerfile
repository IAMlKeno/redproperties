FROM --platform=arm64 drupal:10-php8.3


COPY ./settings.local.php /opt/drupal/web/sites/default
COPY ./entrypoint.sh /usr/local/bin/

RUN apt-get update && apt-get install vim -y
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]