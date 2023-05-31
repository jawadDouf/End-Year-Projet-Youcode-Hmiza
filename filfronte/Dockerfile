# build the app 
FROM node:14 as builde-stage

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build


# serve the app
FROM nginx:1.21-alpine AS production-stage

COPY --from=build-stage /app/dist /usr/share/nginx/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
