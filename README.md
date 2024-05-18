# php-mysql-injection
### Install Docker and VS Code
- Install Docker: Ensure Docker is installed on your system. You can download it from Docker's official website.
- Install Visual Studio Code: Download and install Visual Studio Code.
- Install the Remote - Containers Extension: Open VS Code and install the "Remote - Containers" extension from the Extensions view (Ctrl+Shift+X).
- Ensure Docker desktop is running in your local machine
### Clone the Repo
- Clone this repo to your local machine
### Open the Project in VS Code:
- Open VS Code and use the Remote-Containers: Open Folder in Container... command from the Command Palette (Ctrl+Shift+P).
- Select your project directory (php-mysql-dev-container).
### Start Developing
- VS Code will build the Docker containers and open the workspace inside the php service container.
- You can now edit your PHP files in the src directory and see changes reflected in the running container.
- Access your application at http://localhost:8080.
### Set Up Debugging:
- Set up breakpoints and start debugging using the "PHP Debug" extension.
- Ensure Xdebug is configured correctly in your Dockerfile and devcontainer.json.