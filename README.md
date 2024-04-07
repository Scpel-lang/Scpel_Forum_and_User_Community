<div align="center">
	<img src="https://scpel.org/scpel_logo.png"  width="300" height="300">
</div>

<h2>Community and User Forum</h2>

Welcome to the main source code repository for the Subconscious Electronic Programming Language (Scpel) user and community forum. This forum serves as the primary hub for communication, sharing developments, and accessing community resources.

[Scpel Website]: https://www.scpel.org/

**Note: This README is primarily for contributors rather than users.**
As this project comprises only three files, the initial focus should be on understanding the source structure and the underlying logic of the forum system. Once you have a grasp of these elements, update this README accordingly.

<h2 style="color:#660991;">How It Should Work</h2>
1) Users or anyone can create new posts on the forum.
2) Users or anyone can reply to existing posts on the forum.
3) Each new post initiates a thread group.
4) Subsequent replies in a particular thread group form a chat thread.

To contribute to the Subconscious Electronic Programming Language (Scpel) user and community forum project, follow these steps:

### How to Contribute:

1. **Fork the Repository**: Click on the "Fork" button at the top-right corner of the repository's page on GitHub. This will create a copy of the repository under your GitHub account.

2. **Clone the Forked Repository**: Clone the repository to your local machine using the following command in your terminal:
   ```bash
   git clone https://github.com/your-username/repository-name.git
   ```

3. **Set Up the Development Environment**: Ensure you have a local development environment set up with a web server (such as Apache or Nginx), PHP, and MySQL. Import the provided MySQL database into your local MySQL server.

4. **Make Changes**: Make the necessary changes or enhancements to the codebase to address issues or improve functionality.

5. **Testing**: Test your changes locally to ensure they work as expected. Verify that the forum functionalities mentioned in the README (such as creating new posts, replying to posts, initiating thread groups, and forming chat threads) are functioning correctly.

6. **Commit Changes**: Once you are satisfied with your changes, commit them to your forked repository with descriptive commit messages.
   ```bash
   git add .
   git commit -m "Brief description of changes"
   ```

7. **Push Changes**: Push your commits to your fork on GitHub.
   ```bash
   git push origin master
   ```

8. **Create a Pull Request (PR)**: Go to your forked repository on GitHub and click on the "New pull request" button. Compare the changes you made in your fork with the original repository. Provide a descriptive title and summary for your pull request, outlining the changes you've made.

9. **Review and Discuss**: Engage in discussions with the maintainers and address any feedback or questions they may have regarding your pull request.

10. **Merge Pull Request**: Once your pull request has been reviewed and approved by the maintainers, it will be merged into the main repository.

### Workflow:

- Fork
- Clone
- Make Changes
- Test Locally
- Commit Changes
- Push to Fork
- Create Pull Request
- Review and Discuss
- Merge Pull Request

By following these steps, you can contribute to the Scpel user and community forum project effectively. Good luck with your contributions!

**Note:** This entire mechanism relies on a MySQL database included in this repository. Make sure to utilize your localhost for testing purposes.

**Note:** The first person to comprehend the system logic should update this README so that others can easily understand and contribute with minimal hurdles.

Good luck!

