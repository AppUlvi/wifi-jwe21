// In einem Terminal
// nodejs installieren: https://nodejs.org/ (Wichtig: PATH)
// 1. npm installieren
// 2. node server.js
// https://expressjs.com/
const express = require("express");
const cors = require("cors");

const app = express();
const port = 3000;

app.use(cors());
app.use(express.json());

function printHeaders(req) {
    console.log("Headers");
    console.log(req.headers);
}

app.get("/", function (req, res) {
    console.log("GET Request");

    printHeaders(req);

    console.log("GET Parameters");
    console.log(req.query);

    res.send("Got a GET request");
});

app.post("/", function (req, res) {
    console.log("POST Request");

    printHeaders(req);

    console.log("JSON Body");
    console.log(req.body);

    res.send("Got a POST request");
});

app.listen(port, function () {
    console.log(`Server listening at http://localhost:${port}`);
});
