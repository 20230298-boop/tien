<?php
require_once '../app/models/BookRepository.php';
require_once '../app/models/BorrowerRepository.php';
require_once '../app/models/BorrowRepository.php';

class BorrowsController {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create() {
        $bookRepo = new BookRepository($this->pdo);
        $books = $bookRepo->getAvailableBooks();

        $borrowerRepo = new BorrowerRepository($this->pdo);
        $borrowers = $borrowerRepo->getAll();

        require '../app/views/borrows/create.php';
    }
}