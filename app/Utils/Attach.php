<?php
namespace App\Utils;

use Illuminate\Http\JsonResponse;
use AWS;

trait Attach
{
    public function storageUpload($attach, $storage_path, $file_name)
    {
        $path = $attach->storeAs($storage_path, $file_name);

        return $path;
    }

    public function s3Upload($attach, $bucket, $s3_path, $file_name)
    {
        // flysystem-aws-s3-v3
        $path = $attach->storeAs($s3_path, $file_name, 's3');

        /*
        // aws-sdk
        $s3 = AWS::createClient('s3');
        $path = $s3_path.'/'.$file_name;
        $rs = $s3->putObject([
            'Bucket'    => $bucket,
            'Key'       => $path,
            'SourceFile'    => $attach->path(),
            'ContentType' => 'application/octet-stream'
        ]);
        */

        return $path;
    }

    public function s3Delete($bucket, $file_name)
    {
        $s3 = AWS::createClient('s3');
        $result = $s3->deleteObject([
            'Bucket' => $bucket,
            'Key'    => $file_name
        ]);

        if ($result['DeleteMarker']) {
            return true;
        } else {
            return false;
        }
    }
}