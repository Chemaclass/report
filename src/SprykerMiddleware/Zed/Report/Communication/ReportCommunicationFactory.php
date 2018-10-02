<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\Report\Communication;

use Orm\Zed\Report\Persistence\SpyProcessQuery;
use Orm\Zed\Report\Persistence\SpyProcessResultQuery;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerMiddleware\Zed\Report\Communication\Table\ProcessesTable;
use SprykerMiddleware\Zed\Report\Communication\Table\ProcessResultsTable;
use SprykerMiddleware\Zed\Report\ReportDependencyProvider;

/**
 * @SuppressWarnings(FactoryMethodReturnInterfaceRule)
 */
class ReportCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Spryker\Zed\Gui\Communication\Table\AbstractTable
     */
    public function createProcessesTable(): AbstractTable
    {
        $processQuery = $this->getPropelProcessQuery();
        return new ProcessesTable($processQuery);
    }

    /**
     * @param int $idProcess
     *
     * @return \Spryker\Zed\Gui\Communication\Table\AbstractTable
     */
    public function createProcessResultsTable(int $idProcess): AbstractTable
    {
        $processResultQuery = $this->getPropelProcessResultQuery();
        return new ProcessResultsTable($processResultQuery, $idProcess);
    }

    /**
     * @return \Orm\Zed\Report\Persistence\SpyProcessQuery
     */
    protected function getPropelProcessQuery(): SpyProcessQuery
    {
        return $this->getProvidedDependency(ReportDependencyProvider::PROPEL_PROCESS_QUERY);
    }

    /**
     * @return \Orm\Zed\Report\Persistence\SpyProcessResultQuery
     */
    protected function getPropelProcessResultQuery(): SpyProcessResultQuery
    {
        return $this->getProvidedDependency(ReportDependencyProvider::PROPEL_PROCESS_RESULT_QUERY);
    }
}
