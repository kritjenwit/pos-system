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
    let sql = `SELECT * FROM flow_account`;
    let result = await db.query(sql);
    let response = {
        code: 200,
        message: "success",
        data: result
    };
    res.json(response['data'][0]);
    res.end();
    return
}
async function insertflowaccountHandler(req, res) {
    let description = req.body.description;
    let seller = req.body.seller;
    let type = req.body.type;
    let summary = req.body.summary;
    let status = req.body.status;
    if (!(description && seller && type && summary)) {
        let response = {
            code: 400,
            message: "Empty",
        };
        res.json(response);
        res.end();
        return
    }
    let sql = `INSERT INTO flow_account (description, seller, type, summary, date_time) VALUES (?,?,?,?,?)`;
    let result = await db.query(sql, [description, seller, type, summary, new Date()]);
    if (result && result[0].affectedRows > 0) {
        let response = {
            code: 200,
            message: "success",
        };
        res.json(response);
        res.end();
        return
    } else {
        let response = {
            code: 401,
            message: "insert failed",
        };
        res.json(response);
        res.end();
        return
    }
}
async function updateflowaccountHandler(req, res) {
    let id = req.body.id;
    let sql = `UPDATE  flow_account SET STATUS = 'ชำระแล้ว' WHERE id = ?`;
    let result = await db.query(sql, [id]);
    let response = {
        code: 200,
        message: "success",
    };
    res.json(response);
    res.end();
    return
}
module.exports = {
    flowaccountHandler,
    insertflowaccountHandler,
    updateflowaccountHandler
}