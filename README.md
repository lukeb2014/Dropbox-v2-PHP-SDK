# Dropbox-PHP-SDK-v2
PHP SDK for Dropbox built with the v2 API

**IN DEVELOPMENT**
*Last update: 9/22/2017*

## Next Steps
- Implement with [Composer](https://getcomposer.org/)
- Build more helper functions and classes to do common tasks
- `/token/from_oauth1` needs extra care due to change in `Authorization` header
----------------------

**Bolded** items will not be implemented.

### auth
- [x] /token/from_oauth1
- [x] /token/revoke

### files
- [ ] **/alpha/get_metadata** *PREVIEW*
- [ ] **/alpha/upload** *PREVIEW*
- [x] /copy *DEPRECATED BY /copy_v2*
- [x] /copy_batch
- [x] /copy_batch/check
- [x] /copy_reference/get
- [x] /copy_reference/save
- [x] /copy_v2
- [x] /create_folder *DEPRECATED BY /create_folder_v2*
- [x] /create_folder_v2
- [x] /delete *DEPRECATED BY /delete_v2*
- [x] /delete_batch
- [x] /delete_batch/check
- [x] /delete_v2
- [x] /download
- [x] /get_metadata
- [x] /get_preview
- [x] /get_temporary_link
- [x] /get_thumbnail
- [x] /list_folder
- [x] /list_folder/continue
- [x] /list_folder/get_latest_cursor
- [x] /list_folder/longpoll
- [x] /list_revisions
- [x] /move *DEPRECATED BY /move_v2*
- [x] /move_batch
- [x] /move_batch/check
- [x] /move_v2
- [x] /permanently_delete
- [ ] **/properties/add** *PREVIEW*
- [ ] **/properties/overwrite** *PREVIEW*
- [ ] **/properties/remove** *PREVIEW*
- [ ] **/properties/template/get** *PREVIEW*
- [ ] **/properties/update** *PREVIEW*
- [x] /restore
- [x] /save_url
- [x] /save_url/check_job_status
- [x] /search
- [x] /upload
- [x] /upload_session/append *DEPRECATED BY /upload_session/append_v2*
- [x] /upload_session/append_v2
- [x] /upload_session/finish
- [x] /upload_session/finish_batch
- [x] /upload_session/finish_batch/check
- [x] /upload_session/start

### paper
- [x] /docs/archive
- [x] /docs/create
- [x] /docs/download
- [x] /docs/folder_users/list
- [x] /docs/folder_users/list/continue
- [x] /docs/get_folder_info
- [x] /docs/list
- [x] /docs/list/continue
- [x] /docs/permanently_delete
- [x] /docs/sharing_policy/get
- [x] /docs/sharing_policy/set
- [x] /docs/users/add
- [x] /docs/users/list
- [x] /docs/users/list/continue
- [x] /docs/users/remove

### sharing
- [x] /add_file_member
- [x] /add_folder_member
- [x] /change_file_member_access *DEPRECATED BY /update_file_member*
- [x] /check_job_status
- [x] /check_remove_member_job_status
- [x] /check_share_job_status
- [x] /create_shared_link *DEPRECATED BY /create_shared_link_with_settings*
- [x] /create_shared_link_with_settings
- [x] /get_file_metadata
- [x] /get_file_metadata/batch
- [x] /get_folder_metadata
- [x] /get_shared_link_file
- [x] /get_shared_link_metadata
- [x] /get_shared_links *DEPRECATED BY /list_shared_links*
- [x] /list_file_members
- [x] /list_file_members/batch
- [x] /list_file_members/continue
- [x] /list_folder_members
- [x] /list_folder_members/continue
- [x] /list_folders
- [x] /list_folders/continue
- [x] /list_mountable_folders
- [x] /list_mountable_folders/continue
- [x] /list_received_files
- [x] /list_received_files/continue
- [x] /list_shared_links
- [x] /modify_shared_link_settings
- [x] /mount_folder
- [x] /relinquish_file_membership
- [x] /relinquish_folder_membership
- [x] /remove_file_member *DEPRECATED BY /remove_file_member_2*
- [x] /remove_file_member_2
- [x] /remove_folder_member
- [x] /revoke_shared_link
- [x] /share_folder
- [x] /transfer_folder
- [x] /unmount_folder
- [x] /unshare_file
- [x] /unshare_folder
- [x] /update_file_member
- [x] /update_folder_member
- [x] /update_folder_policy

### users
- [x] /get_account
- [x] /get_account_batch
- [x] /get_current_account
- [x] /get_space_usage