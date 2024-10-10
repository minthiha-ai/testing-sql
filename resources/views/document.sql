---SO Header----

INSERT INTO sale_command.sale_command_document

(
	sale_command_document_id,
	sale_command_document_datenow,
	sale_command_document_no,
	sale_command_status_id,
	create_empcode,
	edit_date,
	computer_name,
	customer_name ,
	customer_code,
	customer_gender,
	customer_address,
	total_amount,
	discount_amount,
	net_amount,
	customer_age,
	sale_command_document_active,
	branch_code,
	vat_amount,
	vat_base_amount,
	gbh_customer_id,
	sale_command_status_name,
	sale_command_document_balance_amount,
	sale_command_document_comment,
	fix_address_sale_code,
	edit_emplcode,
	sale_command_type_id


)


VALUES
(
	---SO Header (Updated V1)----

	(select max(sale_command_document_id) from sale_command.sale_command_document)+1,
	(select now()::date),
	(

		select
		case
		when
		(
			select count(sale_command_document_no) from sale_command.sale_command_document where sale_command_document_datenow::date = now()::date and branch_code='MM-102'
		) = 0
		then
		(
            SELECT
                CONCAT(
                        (SELECT branch_short_name FROM public.master_branch
	WHERE branch_code = 'MM-102')||(SELECT substring(branch_short_name,1,3) FROM public.master_branch
	WHERE branch_code = 'MM-102') || '99SO'||'-' || TO_CHAR(NOW()::date, 'yymmdd'),
                        '-', ''
                    )||
                    '0001'
                 AS sale_command_document_no
		)
		  ELSE (
            SELECT
                LEFT(MAX(sale_command_document_no), LENGTH(MAX(sale_command_document_no)) - 5)
                || '-' ||
                TO_CHAR(
                    RIGHT(MAX(sale_command_document_no), 4)::INTEGER + 1,
                    'fm0000'
                ) AS sale_command_document_no
            FROM sale_command.sale_command_document
            WHERE sale_command_document_datenow::date = NOW()::date
            AND branch_code = 'MM-102'
        )
    END AS sale_command_document_no),
	'1' ,
	'999-999999' ,
	(select now()),
	'administrator',
	 (select * from dblink ('host=192.168.2.63 port=5432
	user=postgres password=repair&installation dbname=repair_and_installation',
         'select bb.firstname||COALESCE(lastname, '''')  as customer_name from public.documents
	aa inner join public.customers bb on aa.customer_id=bb.id
	where repair_job_no=''RPEDG1240616-0002'';')as z
         (
            customer_name character varying (100)
         )) ---- customer name
         ,
	(
	select customer_barcode from dblink ('host=192.168.2.63 port=5432
	user=postgres password=repair&installation dbname=repair_and_installation',
         'select bb.customer_id from public.documents
	aa inner join public.customers bb on aa.customer_id=bb.id
	where repair_job_no=''RPEDG1240616-0002'';')as z
         (
            customer_id bigint
         )
	left join (select gbh_customer_id, customer_barcode
	from gbh_customer)as y on z.customer_id= y.gbh_customer_id)
	,
	 (select * from dblink ('host=192.168.2.63 port=5432 user=postgres
	password=repair&installation dbname=repair_and_installation',
         'select case when titlename=''Mr.'' then ''Male'' else ''Female''
	end as customer_gender
	from public.documents aa inner join public.customers bb on aa.customer_id=bb.id
where repair_job_no=''RPEDG1240616-0002'';')as z
         (
            customer_gender character varying (50)
         )) ,---- customer gender,
	 (select * from dblink ('host=192.168.2.63 port=5432 user=postgres password=repair&installation dbname=repair_and_installation',
         'select bb.address as customer_address from public.documents aa inner join public.customers bb on aa.customer_id=bb.id where repair_job_no=''RPEDG1240616-0002'';')as z
         (
            customer_address character varying (1000)
         )) ---- customer address
         ,
	(select * from dblink ('host=192.168.2.63 port=5432 user=postgres password=repair&installation dbname=repair_and_installation',
          'select case when total_amount is null then ''0''
	else total_amount end
	from public.documents
	where repair_job_no=''RPEDG1240616-0002'';')as z
         (
           total_amount integer
         )), ---total amount,
	'0.00',
	(select * from dblink ('host=192.168.2.63 port=5432 user=postgres password=repair&installation dbname=repair_and_installation',
          'select case when total_amount is null then ''0''
	else total_amount end from public.documents where repair_job_no=''RPEDG1240616-0002'';')as z
         (
           total_amount integer
         )),---net amount,
	'0',
	'true',
	(select * from dblink ('host=192.168.2.63 port=5432 user=postgres password=repair&installation dbname=repair_and_installation',
         'select bb.branch_code from public.documents aa inner join public.branches bb on aa.branch_id=bb.branch_id where repair_job_no=''RPEDG1240616-0002'';')as z
         (
            branch_code character varying(255)
         )),--- branch code,
	(select * from dblink ('host=192.168.2.63 port=5432 user=postgres password=repair&installation dbname=repair_and_installation',
           'select case when total_amount is null then ''0'' else
	(total_amount-(total_amount/1.05))::numeric(19,2) end as vatamount from public.documents where repair_job_no=''RPEDG1240616-0002'';')as z
          (
            vatamount numeric(19,2)
          )), ---vatamount,
	(select * from dblink ('host=192.168.2.63 port=5432 user=postgres password=repair&installation dbname=repair_and_installation',
             'select case when total_amount is null then ''0'' else
	(total_amount/1.05) end as vat_base_amount from public.documents where repair_job_no=''RPEDG1240616-0002'';')as z
           (
              product_price numeric(19,2)
         )),-- vat_base_amount,
	(
	select y.gbh_customer_id from dblink ('host=192.168.2.63 port=5432
	user=postgres password=repair&installation dbname=repair_and_installation',
         'select bb.customer_id from public.documents
	aa inner join public.customers bb on aa.customer_id=bb.id
	where repair_job_no=''RPEDG1240616-0002'';')as z
         (
            customer_id bigint
         )
	left join (select gbh_customer_id, customer_barcode
	from gbh_customer)as y on z.customer_id= y.gbh_customer_id),----gbh_customer_id
	'Draft',
	'0.00',
(select * from dblink ('host=192.168.2.63 port=5432
	user=postgres password=repair&installation
	dbname=repair_and_installation',
         'select finish_remark from public.documents
	where repair_job_no=''RPEDG1240616-0002'';')as z
         (
            finish_remark character varying(255)
         )),
	'SYS99',
	'999-999999',
	'1'
);
