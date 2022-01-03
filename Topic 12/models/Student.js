
const db = require("../config/database");

class Student {
  static all() {
    // return Promise sebagai solusi Asynchronous
    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students";
      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  static async create(data) {
    const id = await new Promise((resolve, reject) => {
      const sql = "INSERT INTO students SET ?";
      db.query(sql, data, (err, results) => {
        resolve(results);
      });
    });

    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students where nim = " + data.nim;
      db.query(sql, (err, results) => {
        if (results != "") {
          const data = {
            status : "Gagal",
            keterangan : "Nim sudah terdaftar!",
          };
          resolve(data)
        } else {
          resolve(results);
        }
      });
    });
  }
  
  static async update(id,data){
      
    await new Promise((resolve, reject) => {
      const sql = "UPDATE students SET ? WHERE id = ?";
      db.query(sql, [data, id], (err, results) => {
        resolve(results);
      }); 
    });
    const student = await this.find(id);
    return student;
  }

  static async find (id){
    return new Promise((resolve, reject)=>{
      const sql = "SELECT * FROM students where id = ?";
      db.query(sql,id,(err,results)=>{
        const [student] = results;
        resolve(student);
      });
    });
  }

  static async delete(id){
    return new Promise((resolve,reject)=>{
      const sql = "DELETE FROM students where id = ?";
      db.query(sql,id, (err, results)=>{
        resolve(results);
      });
    });
  }
}

// export class Student
module.exports = Student;
