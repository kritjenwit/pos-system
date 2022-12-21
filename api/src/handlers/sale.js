var req = require('express').request;
var res = require('express').response;
const db = require("../databased/db");
/*
 * 
 * 
 * 
 * @param {Request} req 
 * @param {Response} res 
 */
async function checksalehandlers(req, res) {
    let user_id = req.body.user_id;
        let sql = "SELECT DATE_FORMAT(DATE, '%M-%Y') AS DATE,SUM(price) AS total FROM sale_amount GROUP BY DATE_FORMAT(DATE,'%M-%Y') ORDER BY DATE_FORMAT(DATE,'%M-%Y') DESC";
        let result = await db.query(sql);
        console.log(result)
        let response = {
            code: 200,
            message: "สำเร็จ",
            data: result[0][0]
        };
        res.json(response);
        res.end();
        return;
}
module.exports = {
    checksalehandlers
 
    
}