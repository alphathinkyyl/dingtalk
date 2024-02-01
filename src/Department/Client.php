<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\Department;

use EasyDingTalk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取子部门 ID 列表
     *
     * @param string $id 部门ID
     *
     * @return mixed
     */
    public function getSubDepartmentIds($id)
    {
        return $this->client->get('department/list_ids', compact('id'));
    }

    /**
     * 获取部门列表
     *
     * @param bool   $isFetchChild
     * @param string $id
     * @param string $lang
     *
     * @return mixed
     */
    public function list($id = null, bool $isFetchChild = false, $lang = null)
    {
        return $this->client->get('department/list', [
            'id' => $id, 'lang' => $lang, 'fetch_child' => $isFetchChild ? 'true' : 'false',
        ]);
    }

    /**
     * 获取部门详情
     *
     * @param string $id
     * @param string $lang
     *
     * @return mixed
     */
    public function get($id, $lang = null)
    {
        return $this->client->get('department/get', compact('id', 'lang'));
    }

    /**
     * 查询部门的所有上级父部门路径
     *
     * @param string $id
     *
     * @return mixed
     */
    public function getParentsById($id)
    {
        return $this->client->get('department/list_parent_depts_by_dept', compact('id'));
    }

    /**
     * 查询指定用户的所有上级父部门路径
     *
     * @param string $userId
     *
     * @return mixed
     */
    public function getParentsByUserId($userId)
    {
        return $this->client->get('department/list_parent_depts', compact('userId'));
    }

    /**
     * 创建部门
     *
     * @param array $params
     *
     * @return mixed
     */
    public function create(array $params)
    {
        return $this->client->post('department/create', $params);
    }

    /**
     * 创建部门 V2 接口https://open.dingtalk.com/document/orgapp/create-a-department-v2
     *
     * @param array $params
     *
     * @return mixed
     */
    public function createV2(array $params)
    {
        return $this->client->post('topapi/v2/department/create', $params);
    }

    /**
     * 更新部门
     *
     * @param string $id
     * @param array  $params
     *
     * @return mixed
     */
    public function update($id, array $params)
    {
        return $this->client->post('department/update', compact('id') + $params);
    }

    /**
     * 更新部门
     *
     * @param string $id
     * @param array  $params
     *
     * @return mixed
     */
    public function updateV2($dept_id, array $params)
    {
        return $this->client->post('topapi/v2/department/update', compact('dept_id') + $params);
    }

    /**
     * 删除部门
     *
     * @param string $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->client->get('department/delete', compact('id'));
    }

     /**
     * 删除部门 https://open.dingtalk.com/document/orgapp/delete-a-department-v2
     *
     * @param string $id
     *
     * @return mixed
     */
    public function deleteV2($dept_id)
    {
        return $this->client->get('topapi/v2/department/delete', compact('dept_id'));
    }
}
