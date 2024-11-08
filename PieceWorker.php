<?php
require_once 'Employee.php';

class PieceWorker extends Employee {
    private int $piecesProduced;
    private float $ratePerPiece;

    public function __construct(string $name, string $address, int $age, string $companyName, int $piecesProduced, float $ratePerPiece) {
        parent::__construct($name, $address, $age, $companyName);
        $this->piecesProduced = $piecesProduced;
        $this->ratePerPiece = $ratePerPiece;
    }

    // Calculate earnings based on pieces produced and rate per piece
    public function earnings(): float {
        return $this->piecesProduced * $this->ratePerPiece;
    }

    // Override __toString to include specific details for a PieceWorker
    public function __toString(): string {
        return parent::__toString() . ", Pieces Produced: {$this->piecesProduced}, Rate per Piece: " . number_format($this->ratePerPiece, 2);
    }
}
