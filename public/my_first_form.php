<!DOCTYPE>
<html>
    <head>
        <title>My First HTML Form</title>
    </head>
<body>
    <h2>User Login</h2>
    <form method="POST" action="http://requestb.in/skj98bsk">
        <p>
            <label for="Username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username">
        </p>
        <p>
            <label for="password">Password</label>
            <input id="password" name="password" type="text" placeholder="Password">
        </p>
        <p>
            <button type="submit">Login</button>
        </p>
    </form>
    <h2>Compose Email</h2>
    <form method="POST" action="http://requestb.in/skj98bsk">
        <p> 
            <label for="text">Text</label>
            <input id="text" name="text" type="text" placeholder="Text">
        </p>
        <p>
            <label for="to">To  </label>
            <input id="to" name="to" type="text" placeholder="To">
        </p>
        <p>
            <label for="from">From</label>
            <input id="from" name="from" type="text" placeholder="From">
        </p>
        <p>
            <label for="subject">Subject</label>
            <input id="subject" name="subject" type="text" placeholder="Subject">
        </p>
        <p>
            <label for="body">eMail Body</label>
            <textarea id="email_body" name="email_body"></textarea>
            <button type="submit">Submit</button>
        </p>
    </form>
    <h2>Select Testing</h2>
    <form method="POST" action="http://requestb.in/skj98bsk">
        <p>Would you recommend Codeup to anyone?</p>
            <label for="answer">Answer</label>
            <select id="answer" name="answer">
                <option value="1">Yes</option>
                <option value="0"selected>No</option>
            </select>
            <button type="submit">Submit</button>

    <h2>Multiple Choice</h2>
        <p>What languages are tought at Codeup?</P>
            <select>
                <option value="Linux">Linux</option>
                <option value="Apache">Apache</option>
                <option value="MYSQL">MYSQL</option>
                <option value="PHP">PHP</option>
                <option value="Javascript">Javascript</option>
                <option value="All of the Above">All of the Above</option>
            </select>
            <button type="submit">Submit</button>
    </form>
</body>
</html>
