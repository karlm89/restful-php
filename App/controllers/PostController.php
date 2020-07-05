<?php 
    class PostController {
        public function __constuct () {
            $this->conn = $db;
        }
        public function index () {
            $data = 'SELECT 
                c.name as category_name,
                p.id, p.category_id, p.title,
                p.body, p.author, p.created_at
                FROM '. $this->table .
                ' p LEFT JOIN categories c ON p.category_id = c.id
                ORDER BY p.created_at DESC';

            // Prepare statement
            $stmt = $this->conn->prepare($data);

            // Execute Statment
            $stmt->execute();

            // Return Data
            return $stmt;
        }
        public function create () {

        }
        public function store () {

        }
        public function show () {
            $data = 
                'SELECT 
                    c.name as category_name,
                    p.id, p.category_id, p.title,
                    p.body, p.author, p.created_at
                FROM '. $this->table .
                    ' p LEFT JOIN categories c ON p.category_id = c.id
                    WHERE p.id = ?
                    LIMIT 0,1 ';

            // Prepare statement
            $stmt = $this->conn->prepare($data);

            // Bind ID
            $stmt->bindParam(1, $this->id);

            // Execute Statment
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set props
            $this->title = $row['title'];
            $this->author = $row['author'];
            $this->category_id = $row['category_id'];
            $this->category_name = $row['category_name'];
            $this->body = $row['body'];
            $this->created_at = $row['created_at'];
        }
        public function edit () {

        }
        public function update () {

        }
        public function destroy () {

        }
    }