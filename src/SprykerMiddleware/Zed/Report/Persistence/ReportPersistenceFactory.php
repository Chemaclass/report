<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerMiddleware\Zed\Report\Persistence;

use Orm\Zed\Report\Persistence\SpyProcessQuery;
use Orm\Zed\Report\Persistence\SpyProcessResultQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use SprykerMiddleware\Zed\Report\Dependency\Service\ReportToUtilEncodingInterface;
use SprykerMiddleware\Zed\Report\Persistence\Mapper\ProcessResultMapper;
use SprykerMiddleware\Zed\Report\ReportDependencyProvider;

class ReportPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Report\Persistence\SpyProcessQuery
     */
    public function createProcessQuery(): SpyProcessQuery
    {
        return $this->getProvidedDependency(ReportDependencyProvider::PROPEL_PROCESS_QUERY);
    }

    /**
     * @return \Orm\Zed\Report\Persistence\SpyProcessResultQuery
     */
    public function createProcessResultQuery(): SpyProcessResultQuery
    {
        return $this->getProvidedDependency(ReportDependencyProvider::PROPEL_PROCESS_RESULT_QUERY);
    }

    /**
     * @return \SprykerMiddleware\Zed\Report\Persistence\Mapper\ProcessResultMapper
     */
    public function createProcessResultMapper(): ProcessResultMapper
    {
        return new ProcessResultMapper($this->getUtilEncodingService());
    }

    /**
     * @return \SprykerMiddleware\Zed\Report\Dependency\Service\ReportToUtilEncodingInterface
     */
    public function getUtilEncodingService(): ReportToUtilEncodingInterface
    {
        return $this->getProvidedDependency(ReportDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}
