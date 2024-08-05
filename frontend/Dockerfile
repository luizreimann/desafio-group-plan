FROM node:14

# Set working directory
WORKDIR /app

# Install app dependencies
COPY package*.json ./
RUN npm install

# Copy app files
COPY . .

# Install TypeScript and Laravel Mix globally
RUN npm install -g typescript laravel-mix

# Set correct permissions
RUN chmod -R 755 /app/public

# Expose port and start application
EXPOSE 8080
CMD ["sh", "-c", "npm run start && tail -f /dev/null"]
