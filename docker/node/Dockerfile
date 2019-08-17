# Dockerfile for dev
FROM node:latest
#EXPOSE 8080

# Hopefully you'd never actually do this, just copy everything, including locally installed node_modules
#COPY ./ ./

WORKDIR /var/www

CMD yarn install && npm run watch
