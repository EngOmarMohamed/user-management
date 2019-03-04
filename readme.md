# User Management APIs
## Project Architecture
![Alt text](UserManagement.png?raw=true "domain_model")

### User
    Params
    - name: string
    - email: string
- Create user  `POST /user` with payload user params
- Delete user  `DELETE /user/{id}`
- Assign group to user  `POST /user/{user_id}/group` with payload `{group_id}`
- Detach user from group  `DELETE /user/{user_id}/group` with payload `{group_id}`


### Group
    Params
    - name: string
- Create user  `POST /group` with payload user params
- Delete user  `DELETE /group/{id}`
