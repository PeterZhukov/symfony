<?php
namespace App\Controller\EasyAdmin;

use App\Entity\Genus;
use App\Service\CsvExporter;
use App\Controller\EasyAdmin\AdminController;

class GenusController extends AdminController {
    /**
     * @var CsvExporter
     */
    private $csvExporter;

    public function __construct(CsvExporter $csvExporter){

        $this->csvExporter = $csvExporter;
    }

    public function exportAction(){
        $sortDirection = $this->request->query->get('sortDirection');
        if (empty($sortDirection) || !in_array($sortDirection, ['ASC', 'DESC'])){
            $sortDirection = 'DESC';
        }

        $queryBuilder = $this->createListQueryBuilder(
            $this->entity['class'],
            $sortDirection,
            $this->request->query->get('sortField'),
            $this->entity['list']['dql_filter']
        );

        return $this->csvExporter->getResponseFromQueryBuilder($queryBuilder, Genus::class, 'genuses.csv');
    }
}
