<?php
/**
 * 函数库
 *
 * @author   jirry <390066398@qq.com>
 * @date     2019/6/13
 * @time     16:14
 */

/**
 * 请求对象
 *
 * @return \Swoft\Http\Message\Request
 */
function request()
{
    return \Swoft\Context\Context::mustGet()->getRequest();
}

/**
 * 获取请求头数据
 *
 * @param string|null $name       参数名
 * @param int         $dataFormat 数据格式
 *
 * @return array|null|string
 */
function headerData(string $name = null, int $dataFormat = DATA_FORMAT_STRING)
{
    if ($name) {
        if ($dataFormat == DATA_FORMAT_STRING) {
            $data = request()->getHeaderLine($name);
        }
        if ($dataFormat == DATA_FORMAT_ARRAY) {
            $data = request()->getHeader($name);
        }
    } else {
        $data = $headers = request()->getHeaders();
        if ($dataFormat == DATA_FORMAT_STRING) {
            foreach ($headers as $name => $val) {
                $data[$name] = implode(',', $val);
            }
        }
    }

    return isset($data) ? $data : null;
}

/**
 * 获取GET数据
 *
 * @param string             $key     参数名
 * @param array|mixed|string $default 默认值
 *
 * @return array|mixed|string
 */
function getData(string $key = '', $default = null)
{
    return request()->get($key, $default);
}

/**
 * 获取POST数据
 *
 * @param string             $key     参数名
 * @param array|mixed|string $default 默认值
 *
 * @return array|mixed|string
 */
function postData(string $key = '', $default = null)
{
    return request()->post($key, $default);
}

/**
 * 获取GET & POST数据
 *
 * @param string             $key     参数名
 * @param array|mixed|string $default 默认值
 *
 * @return array|mixed|string
 */
function inputData(string $key = '', $default = null)
{
    return request()->input($key, $default);
}

/**
 * 响应对象
 *
 * @return \Swoft\Http\Message\Response
 */
function response()
{
    return \Swoft\Context\Context::mustGet()->getResponse();
}

/**
 * 数据打印
 *
 * @param string|null|array $data
 *
 * @return null|\Swoft\Http\Message\Response|static
 */
function dump($data = null)
{
    if (is_string($data)) {
        return response()->withContent($data);
    }
    return response()->withData($data);
}