var Request = require('express').request;
var Response = require('express').response;
const db = require("../databased/db");
/**
 * @dev get use to with login and register
 */

/**
 * loginHandler
 * 
 * To handler login request
 * 
 * @param {Request} req
 * @param {Response} res
 */
async function stockHandler(req, res) {
    let id = req.body.id;
    let sql = `SELECT * FROM stock`;
    let result = await db.query(sql);
    //console.log("hello");
    console.log(result[0]);
        let response = {
            code: 200,
            message: "success",
            data: result
        };
        res.json(response['data'][0]);
        res.end();
        return
}

module.exports = {
    stockHandler
};


//new Date();
//result && result[0].affectedRows > 0
//let userId = result[0].insertId;