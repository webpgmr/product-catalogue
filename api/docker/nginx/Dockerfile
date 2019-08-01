# nginx
FROM nginx:alpine

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./conf.d /etc/nginx/sites-available
COPY . /srv/api

CMD ["nginx"]

EXPOSE 80 80
