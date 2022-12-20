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
async function flowaccountHandler(req, res) {
    let id = req.body.id;

    if (!(id)) {
        let response = {
            code: 401,
            message: "Id is empty."
        };
        res.json(response);
        res.end();
        return;
    }

    let sql = `SELECT * FROM flow_account WHERE userid = ?`;


    let result = await db.query(sql,[id]);
    //console.log(result[0]);
    //login success.
    if (result && result[0].length > 0) {
        let response = {
            code: 200,
            message: "success",
        };
        res.json(response);
        res.end();
        return
    }
    // login Failed
    else {
        let response = {
            code: 200,
            message: "success",
        };
        res.json(response);
        res.end();
        return
    }
    // end
    //res.send("Hello");
    //console.log(req.body);
}

module.exports = {
    flowaccountHandler
};


//new Date();
//result && result[0].affectedRows > 0
//let userId = result[0].insertId;