const express = require ("express");

const app = express();

app.listen (3000);

app.use(express.json());

const router = require("./routes/api.js");

app.use(router);