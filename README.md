# Dropbox-PHP-SDK-v2
PHP SDK for Dropbox built with the v2 API

*IN DEVELOPMENT*
================
*Last update: 7/28/2017*

**Bolded** items will not be implemented.

### auth
- [ ] /token/from_oauth1
- [ ] /token/revoke

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
- [ ] /move *DEPRECATED BY /move_v2*
- [ ] /move_batch
- [ ] /move_batch/check
- [ ] /move_v2
- [ ] /permanently_delete
- [ ] **/properties/add** *PREVIEW*
- [ ] **/properties/overwrite** *PREVIEW*
- [ ] **/properties/remove** *PREVIEW*
- [ ] **/properties/template/get** *PREVIEW*
- [ ] **/properties/update** *PREVIEW*
- [ ] /restore
- [ ] /save_url
- [ ] /save_url/check_job_status
- [ ] /search
- [x] /upload
- [ ] /upload_session/append *DEPRECATED BY /upload_session/append_v2*
- [ ] /upload_session/append_v2
- [ ] /upload_session/finish
- [ ] /upload_session/finish_batch
- [ ] /upload_session/finish_batch/check
- [ ] /upload_session/start

### paper
- [ ] /docs/archive
- [ ] /docs/download
- [ ] /docs/folder_users/list
- [ ] /docs/folder_users/list/continue
- [ ] /docs/get_folder_info
- [ ] /docs/list
- [ ] /docs/list/continue
- [ ] /docs/permanently_delete
- [ ] /docs/sharing_policy/get
- [ ] /docs/sharing_policy/set
- [ ] /docs/users/add
- [ ] /docs/users/list
- [ ] /docs/users/list/continue
- [ ] /docs/users/remove

### sharing
- [ ] /add_file_member
- [ ] /add_folder_member
- [ ] /change_file_member_access *DEPRECATED BY /update_file_member*
- [ ] /check_job_status
- [ ] /check_remove_member_job_status
- [ ] /check_share_job_status
- [ ] /create_shared_link *DEPRECATED BY /create_shared_link_with_settings*
- [x] /create_shared_link_with_settings
- [ ] /get_file_metadata
- [ ] /get_file_metadata/batch
- [ ] /get_folder_metadata
- [ ] /get_shared_link_file
- [ ] /get_shared_link_metadata
- [ ] /get_shared_links *DEPRECATED BY /list_shared_links*
- [ ] /list_file_members
- [ ] /list_file_members/batch
- [ ] /list_file_members/continue
- [ ] /list_folder_members
- [ ] /list_folder_members/continue
- [ ] /list_folders
- [ ] /list_folders/continue
- [ ] /list_mountable_folders
- [ ] /list_mountable_folders/continue
- [ ] /list_received_files
- [ ] /list_received_files/continue
- [ ] /list_shared_links
- [ ] /modify_shared_link_settings
- [ ] /mount_folder
- [ ] /relinquish_file_membership
- [ ] /relinquish_folder_membership
- [ ] /remove_file_member *DEPRECATED BY /remove_file_member_2
- [ ] /remove_file_member_2
- [ ] /remove_folder_member
- [ ] /revoke_shared_link
- [ ] /share_folder
- [ ] /transfer_folder
- [ ] /unmount_folder
- [ ] /unshare_file
- [ ] /unshare_folder
- [ ] /update_file_member
- [ ] /update_folder_member
- [ ] /update_folder_policy

### users
- [ ] /get_account
- [ ] /get_account_batch
- [ ] /get_current_account
- [ ] /get_space_usage
