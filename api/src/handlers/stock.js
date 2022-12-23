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

async function insertstockHandler(req, res) {
    let product_id = req.body.product_id;
    let product_name = req.body.product_name;
    let type = req.body.type;
    let date_time = req.body.date_time;
    let remain = req.body.remain;
    let status = req.body.status;
    if (!(product_id && product_name && type)) {
        let response = {
            code: 200,
            message: "success",
            data: result
        };
        res.json(response['data'][0]);
        res.end();
        return
    }
    let sql = "SELECT * FROM stock WHERE product_id = ? AND product_name = ? ";
    let result = await db.query(sql, [product_id, product_name]);
    let count = result[0].length;
    let cnt = 1;
    if (result && result[0].length > 0) {
        sql = "UPDATE stock SET remain = ? WHERE product_id = ? AND product_name = ?";
        result = await db.query(sql, [(result[0][0]['remain']) + cnt, product_id, product_name]);
        if (result && result[0].affectedRows > 0) {
            let response = {
                code: 200,
                message: "success",
                data: result
            };
            res.json(response);
            res.end();
            return
        }
    } else {
        sql = "INSERT INTO stock (product_id,product_name,type,date_time,remain) VALUES (?,?,?,?,?)";
        result = await db.query(sql, [product_id, product_name, type, new Date(), cnt]);
        if (result && result[0].affectedRows > 0) {
            let response = {
                code: 200,
                message: "success",
                data: result
            };
            res.json(response);
            res.end();
            return
        }
    }

}
async function showstockHandler(req, res) {
    let id = req.body.id;
    let sql = `SELECT * FROM stock`;
    let result = await db.query(sql);
    let response = {
        code: 200,
        message: "success",
        data: result
    };
    res.json(response['data']);
    res.end();
    return
}

async function insertwithidstockHandler(req, res) {
    let product_id = req.body.product_id
    let sql = "SELECT * FROM stock WHERE product_id = ?";
    let result = await db.query(sql, [product_id]);
    let cnt = 1;
    if(result && result[0].length > 0){
        sql = "UPDATE stock SET remain = ? , date_time = ? WHERE product_id = ? ";
        result = await db.query(sql, [(result[0][0]['remain']) + cnt,new Date(),product_id]);
        if(result && result[0].affectedRows > 0){
            let response = {
                code: 200,
                message: "success",
                data: result
            };
            res.json(response);
            res.end();
            return
        }
        else{
            let response = {
                code: 400,
                message: "Update Failed.",
            };
            res.json(response);
            res.end();
            return
        }
    }
}

async function saleinsertwithidstockHandler(req, res) {
    let product_id = req.body.product_id;
    let amount = req.body.amount;
    let sql = "SELECT * FROM stock WHERE product_id = ?";
    let result = await db.query(sql, [product_id]);
    let cnt = amount;
    if(result && result[0].length > 0){
        sql = "UPDATE stock SET remain = ? , date_time = ? WHERE product_id = ? ";
        result = await db.query(sql, [(result[0][0]['remain']) - cnt,new Date(),product_id]);
        if(result && result[0].affectedRows > 0){
            let response = {
                code: 200,
                message: "success",
                data: result
            };
            res.json(response);
            res.end();
            return
        }
        else{
            let response = {
                code: 400,
                message: "Update Failed.",
            };
            res.json(response);
            res.end();
            return
        }
    }
}

module.exports = {
    insertstockHandler,
    showstockHandler,
    insertwithidstockHandler,
    saleinsertwithidstockHandler

}